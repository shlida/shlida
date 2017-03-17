<style type="text/css">
    .VueCarousel-slide {
      position: relative;
      background: #42b983;
      color: #fff;
      font-family: Arial;
      font-size: 24px;
      text-align: center;
      min-height: 100px;
    }

    .label {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
</style>

<template>
    <div>
        <carousel :perPage="1" :perPageCustom="[[992, 3]]">
            <slide><span class="label">1</span></slide><slide><span class="label">2</span></slide><slide><span class="label">3</span></slide><slide><span class="label">4</span></slide><slide><span class="label">5</span></slide>
        </carousel>
        
    </div>
</template>
<script>
    import { Carousel, Slide } from 'vue-carousel';
    export default {
      components: {
        Carousel,
        Slide
      }
    };
</script>