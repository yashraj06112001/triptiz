<template>
  <div id="third">
    <h1>{{ name }}</h1>
    <!--details of the user current-->
    <div id="details">
      <p>the seat of the {{ name }} is {{ seat }}</p>
      <br />
      <p>the station from which the user will board is {{ station1 }}</p>
      <br />
      <p>the destination station of the user is {{ station2 }}</p>
      
    </div>
  </div>
</template>
<script>
export default {
  data: function () {
    return {
      name: "",
      station1: "",
      station2: "",
    };
  },
};
</script>
