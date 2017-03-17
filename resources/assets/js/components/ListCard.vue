<style lang="scss">
    @import "../../sass/_variables.scss";
    
    a {
        text-decoration: none;
    }
    .list-card {
        border: 1px solid lightgray;
        border-radius: 1px;
    }

    .item {
        @include media-breakpoint-down(sm) {
            padding: 0;
            margin: 0;
        } 
    }
        
    #user {
        padding: 10px 0; 
        .user-img {
            width: 45px;
        }
        .user-level {
            display: inline-block;
            width: 18px;
            height: 18px;
            background-color: black;
            bottom: 12px;
            left: 52px;
            position: absolute;
            border-radius: 10px;
        }
        .user-detail {
            display: inline-block;
            line-height: 15px;
            margin-left: 10px;
        }
    }

    #cover {
        @include media-breakpoint-up(lg) {
            height: 250px;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }
        .cover-img {
            width: 100%;
            @include media-breakpoint-up(lg) {
                width: auto;
                min-width: 100%;
                height: 100%;
                flex: none;
            }
        }
        .icon-save {
            $width:auto;
            @if $width == 'auto' {
                color:#000;
            } @else {
                color:#fff;
            }

            right: 30px;
            margin-top: -5px;
            position: absolute;
        }
    }

    #content {
        word-wrap:break-word;
        padding-top: 20px;
        .title {
            min-height: 76px;
            padding-top: 10px;
        }
        .footter {
            padding-bottom: 20px;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between; 
        }
        .icon-time {
            color: gold;
        }
        .icon-time p {
            display: inline-block;
            font-style: normal;
            color: black;
        }
        .icon-comment {
            color: lightblue;
        }
        .icon-comment p {
            display: inline-block;
            font-style: normal;
            color: black;
        }
        .icon-location p {
            display: inline-block;
            font-style: normal;
            color: black;
        }
        .place {
            word-wrap:break-word;
        }
        .btn-love {
            display: inline-block;
        }  
    }

    .line-shadow {
        height: 20px; 
        box-shadow: 0 10px 15px -15px black inset; 
    }
</style>

<template>
    <div>
        <div class="list-card">
            <div class="col-12" v-if="username">
                <div id="user">
                    <img class="user-img rounded-circle" src="http://s.jeban.com/userfiles/thumbs/members/100x100/75381.jpg">
                    <div class="user-level"></div>
                    <div class="user-detail align-middle">
                        <b>{{ username }}</b><br>
                        <small>{{ username }}</small>
                    </div>
                </div>
            </div>
            <div id="cover">
                <i class="icon-save"></i>
                <img :src="cover" class="cover-img">
            </div>
            <div class="col-12">
                <div id="content">
                    <small>
                        <p><a href="">{{ type }}</a></p>
                        <div class="title">
                            <h5 v-if="title.length > 70">{{ title.substr(0,70)+' ...' }}</h5>
                            <h5 v-else>{{ title }}</h5>
                        </div>
                        
                        <div class="footter">
                            <div>
                                <i v-if="time" class="icon-time"><p>{{ time }}</p></i> 
                                <i v-if="comment" class="icon-comment"><p>{{ comment }}</p></i> 
                                <div v-if="place" class="place">
                                    <i class="icon-location"><p v-if="place.length > 65">{{ place.substr(0,22)+' ...' }}</p></i>
                                </div> 
                            </div>
                            <div>
                                {{ love }}
                                <div class="btn-love"><button class="btn btn-circle"><i class="icon-loved"></i></button></div>
                            </div>
                        </div>
                    </small>
                </div>
            </div> 
        </div>
        <div class="line-shadow"><hr></div>
    </div>
</template>

<script>
export default {
    props: ['username','cover','type','title','time','comment','place','love']
};
</script>
