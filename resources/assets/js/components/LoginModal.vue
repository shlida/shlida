<template>
	<modal>
		<h2 slot="title">Login</h2>
		<div slot="content">
			<div class="input-group"> 
				<div class="input-group-addon"><i class="icon-member"></i></div> 
				<input type="text" class="form-control" placeholder="Username or Email"> 
			</div>
			<div class="input-group"> 
				<div class="input-group-addon"><i class="icon-password"></i></div> 
				<input type="text" class="form-control" placeholder="Password"> 
			</div>
		</div>
	</modal>
</template>

<script>
	import Modal from './Modal.vue'
</script>