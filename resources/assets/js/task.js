
 const app = new Vue({
        delimiters: ["<%","%>"],
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
