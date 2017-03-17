<style lang="scss">
.modal-wrapper {
    width: 100%;
    box-shadow: 0 1px 5px 1px lightgrey;
    margin-bottom: 20px;
    padding-top:20px;
    padding-bottom: 30px;
    
    .modal-header {
        border: none;
    }
}
</style>

<template>
    <div class="modal-wrapper">
        <div class="col-12">
            <div class="modal-header">
                <div><small>Event on</small> {{ date }}</div>
                <div @click="$emit('close')"><i class="icon-close"></i></div>
            </div>
            <div class="modal-body">
                <div class="event-content">
                    <div id="listModal" class="row item">
                        <div class="col-lg-4 col-sm-12 item" v-for="item in dateList">
                            <list-card :cover="item.image_url" :type="item.event_type" :title="item.title" :time="item.date" :comment="item.comment_count" :love="item.love_count"></list-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        props: ['date', 'dateList'],
    }
</script>

