<style>
    .user {
        padding: 10px 0;
    }
    .user-img {
        width: 45px;
    }
    .user-detail {
        display: inline-block;
        line-height: 15px;
    }
    .content {
        padding: 10px 0;
    }
    .line-shadow {
            height: 20px; 
            box-shadow: 0 10px 15px -15px black inset; 
        }
    .icon-time {
        color: gold;
    }
    .icon-comment {
        color: lightblue;
    }
</style>

<template>
    <div>
        <div v-for="(item, key) in list">
            <div id="list-box">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="user">
                                <img class="user-img rounded-circle" src="http://s.jeban.com/userfiles/thumbs/members/100x100/75381.jpg">
                                <div class="user-detail align-middle">
                                    <b>{{ item.user.username }}</b><br>
                                    <small>{{ item.user.username }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <img :src="item.cover_url" class="img-fluid">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="content">
                                <small>
                                    <p><a href="">{{ item.topic_type }}</a></p>
                                    <p><h6>{{ item.title }}</h6></p>
                                    <i class="icon-time"></i> {{ item.timestamp_content }}
                                    @if ($topic->comment_count)
                                        <i class="icon-comment"></i> 0
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-shadow"><hr></div>
            </div>
        </div>
        <infinite-loading :on-infinite="onInfinite" ref="infiniteLoading">
            <span slot="no-more">
                There is no more Data
            </span>
        </infinite-loading>
    </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';

const api = 'http://localhost:8080/api/v1/board/';

export default {
    data: function (){
        return {
            list: []
        }
    },
    props: ['data','type'],
    computed: {
        items: function(){
            return this.data;
        }
    },
    methods: {
        onInfinite() {
            if(this.list.length == 0){
                this.list = this.list.concat(this.items);
                this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
            } else {
                this.$http.get(api+this.type, {
                    params: {
                        page: this.list.length / 5 + 1,
                    },
                }).then((res) => {
                    let status = res.data.status;
                    let data = res.data.data;
                    if (status && data.total > 5) {
                        this.list = this.list.concat(data.data);
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                        if (this.list.length == data.total) {
                            this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                        }
                    } else {
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                    }
                });
            }
        },
    },
    components: {
        InfiniteLoading,
    },
};
</script>
