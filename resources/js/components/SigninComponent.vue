<template>
  <div id="down">
    <div id="icon">
      <p>about</p>
      <p>stations</p>
      <p>price sheet</p>
    </div>
    <br />
    <div>
      <form class="custom-form">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" class="form-control" v-model="name" />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" class="form-control" v-model="email" />
        </div>
        <button v-on:click.prevent="formSubmit">form submit</button>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "sigin component",
  data: function () {
    return {
      name: "default",
      email: "default@default.com",
    };
  },
  methods: {
    formSubmit: async function () {
      try {
        let c = await axios.post("http://127.0.0.1:8000/api/info", {
          name: this.name,
          email: this.email,
        });
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>

<style>
#icon {
  display: grid;
  column-gap: 10px;
  grid-template-columns: repeat(3, 1fr);
  background-color: rgb(234, 219, 219);
  color: black;
}
.custom-form {
  background-color: #f9e01f; /* Yellow background color */
  padding: 20px;
  border: 2px solid #f9e01f; /* Yellow border */
  border-radius: 10px;
  width: 300px;
  margin: 0 auto;
  box-shadow: 20px 20px 10px black;
}
.form-group {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
  color: black; /* White text color */
  display: block;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #f9e01f; /* Yellow border for input fields */
  border-radius: 5px;
  background-color: white; /* White background for input fields */
  color: #333; /* Text color for input fields */
}
</style>