<style lang="sass">
    @import "../../sass/listCard.scss";
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
