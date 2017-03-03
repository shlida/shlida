<template>
	<div>
		<carousel paginationActiveColor="#000" paginationColor="#fff" :perPage="1" :perPageCustom="[[992,3]]"><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide><slide>
                <span class="label">
                    <list-card :username="username" :cover="cover" :type="type" :title="title" :time="time" :comment="comment" :love="love"></list-card>
                </span>
            </slide></carousel>
	</div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
    data() {
        return {
            username: 'user',
            cover: 'http://s.jeban.com/userfiles/thumbs/topics/500x300/211081.jpg',
            type: 'type',
            title: 'title',
            time: '1 day',
            comment: 0,
            love: 0
        }
    },
    components: {
        'carousel': Carousel,
        'slide': Slide
    }
};
</script>
