  Vue.use(VeeValidate);

  var app = new Vue({
  	el: '#app',
      data: {
      	firstName: "",
          lastName: "",
          email: "",
          password: ""
      },
      methods: {
      	signUp: function(e) {
          	//Sign User Up
            alert('success');
          }
      }
  });
