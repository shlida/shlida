<template id="modal-box-template">
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header d-flex justify-content-start">
	      			<p>{{ title }}</p>
	      			<slot name="title"></slot>
	        		<i class="icon-close" data-dismiss="modal"></i>
	      		</div>
	      		<div class="modal-body">
	      			<p>{{ content }}</p>
	      			<slot name="content"></slot>
	      		</div>
	  		</div>
		</div>
	</div>
</template>

<style lang="scss">
	@import "../../sass/_variables.scss";
	
	.modal-backdrop {
		&.show {
			opacity: 0;
		}
	}

	.modal-dialog {
		margin: 10% auto;
	}
	.modal-content {
		border-radius: 0.125rem;
		box-shadow: $box-shadow;
		.modal-header {
			padding: 0.9375rem;
			border: none;
			i {
				&.icon-close {
					position: absolute;
					top: 0.9375rem;
					right: 0.9375rem;
				}
			}
		}
		.modal-body {
			padding: 1.875rem 0.9375rem;
		}
	}
</style>

<script>
    export default{
    	props: ['title', 'content'],
    	mounted: function(){
    		$(this.$el).on('shown.bs.modal', function (e) {
    			if ($(this).hasClass('show-backdrop')) {
    				$(this).parents().find('.modal-backdrop.show').css( "opacity", "0.7" );
    			}
			})
    	}
    }
</script>