<script>
import {loginUrl, userUrl, getCsrf, getHeader} from '../../config'
export default {
	data () {
		return {
			  login: {
				    username: 'aa@aa.co',
				    password: '111111',
				    csrf: '',
			  }
		}
	},

	/*props: ['csrf'],*/

	methods: {
		handleLoginFormSubmit: function () {
			console.log('submitted')
			const postData = {
		        username: this.login.username,
		        password: this.login.password,
		        csrf: getCsrf(),
			}
  		const authUser = {}

  		axios.post(loginUrl, postData)
  		.then(response => {
  				if (response.status === 200) {
  					console.log(response.data);
            window.location.href='/document'
  				}
	    });
		},

		getUser: function () {
			console.log('get user')
			axios.get(userUrl)
      			.then(response => {
      				if (response.status === 200) {
      					console.log(response.data);
      				}
			    });
		},
	},
}

</script>

<template>
  <div class="wrapper" id="login-wrapper">
    <section class="login">
      <div class="row">
        <div class="col-md-6 col-md-push-3">
          <div class="panel panel-default">
            <div class="panel-heading"><strong>Login</strong></div>
            <div class="panel-body">
              <form v-on:submit.prevent="handleLoginFormSubmit()">


                <div class="form-group">
                  <label>Email address</label>
                  <input
                    name="username"
                    class="form-control"
                    placeholder="Enter your email address"
                    type="text"
                    v-model="login.username"
                  >
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input
                    name="password"
                    class="form-control"
                    placeholder="Enter your password"
                    type="password"
                    v-model="login.password"
                  >
                </div>

                <input
                	class="form-control"
                	name="_token"
                	type="hidden"
                	v-model="login.csrf"
                >
                <button class="btn btn-primary">Login</button>
              </form>

              <!--button class="btn btn-primary" v-on:click="getUser">Get user</button-->
              <hr>
              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <a href="/auth/facebook" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                      <a href="/auth/google" class="btn btn-google-plus"><i class="fa fa-github"></i> Google</a>
                      <a href="/auth/twitter" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</template>
