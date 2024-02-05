<template>
  <div id="container">
    <!--this is the home container-->

    <div id="header " class="item">
      <!--this is the header-->
      <h1>Mixer</h1>
      <br />
      <i>this is to mix for the results</i>
      <br />
      <b id="caution">CAUTION- ONLY FOR EMPLOYEES!!!</b>
    </div>

    <div id="intermediate" class="item">
      <!--this is my intermediate containerer-->
      <div id="buttonpeaker">
        <form>
          <button v-on:click.prevent="buttonPressed">
            Press the button to execute the process of mixing
          </button>
          <div :style="{ backgroundColor: boxColor }" class="color-box">
            <p>I am that box</p>
          </div>
        </form>
      </div>
    </div>

    <div id="footer" class="item"></div>
    <!--this is my footer container-->
  </div>
</template>
<script>
import axios from "axios";
export default {
  data: function () {
    return {
      isLoading: false,
      boxColor: "black", // Initial color is yellow
    };
  },
  methods: {
    buttonPressed: async function () {
      this.isLoading = true; // Set loading state to true before making the request

      try {
        let x = await axios.post("http://127.0.0.1:8000/api/solution");
        // Handle success if needed
        this.boxColor = "green"; // Set color to green on success
      } catch (error) {
        // Handle errors
        console.error("An error occurred:", error);
        this.boxColor = "red"; // Set color to red on error
      } finally {
        this.isLoading = false; // Set loading state to false after the request completes (success or error)
      }
    },
  },
};
</script>
<style>
#container {
  display: grid;
  height: 97vh;
  width: 97vw;
  width: auto;
  grid-template-rows: repeat(3, 1fr);
  background-color: #ededdd;
}
.item {
  border-style: groove;
}
#footer {
  background-color: black;
  grid-row-start: 3;
  grid-row-end: 4;
}
#intermediate {
  grid-row-start: 2;
  grid-row-end: 3;
  display: grid;
  grid-template-rows: repeat(3, 1fr);
}
#buttonpeaker {
  color: black;
  background-color: green;
  font-size: medium;
}
#buttonpeaker:hover {
  background-color: yellow;
  font-size: larger;
  color: white;
}
.item {
  background-color: #c7c91a;
}
#caution {
  color: red;
}
.color-box {
  width: 100px; /* Adjust the width based on your design */
  height: 100px; /* Adjust the height based on your design */
  margin-top: 20px; /* Adjust the margin based on your design */
}
</style>
