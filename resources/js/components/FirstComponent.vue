<template>
  <div id="root">
    <div id="box1">
      <img src="images/logo.jpg" style="height: 150px; width: 200px" id="im" />
      <p id="logoname">{{ msg }}</p>
    </div>

    <div id="downfall">
      <signin-component></signin-component>
    </div>
  </div>
</template>
<script>
import SigninComponent from "./SigninComponent.vue";
export default {
  components: { SigninComponent },
  data: function () {
    return {
      msg: "triptix",
    };
  },
};
</script>
<style>
#box1 {
  border-style: solid;
  border-color: grey;
  border-radius: 50px;
  height: 17vh;
  width: 92vw;
  background-color: #ab951b;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-template-rows: repeat(2, 1fr);
  padding: 50px;
}
#logoname {
  color: black;
  font-family: Georgia, Serif;
  text-align: center;
  font-size: 40px;
  text-decoration-thickness: 10px;
  grid-column-start: 2;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-end: 2;
  justify-self: start;
}
#im {
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 1;
  grid-row-end: 2;
  justify-self: start;
  box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.5);
  align-self: top;
}
#downfall {
  background-image: url("/images/triptix.jpg");
  background-size: cover; /* Cover the entire container with the background image */
  background-repeat: no-repeat; /* Prevent image repetition */
  background-position: center;
  height: 60vh;
}
</style>
