<template>
  <div id="details">
    <div id="heading"><h1>Details</h1></div>
    <br />
    <div v-if="loading">
      <vue-spinner-ball-beat color="#3498db" :size="50" />
    </div>
    <div v-if="error">
      <div class="error-message">Error: {{ error.message }}</div>
    </div>
    <div id="form">
      <form>
        <label id="name">Name</label>
        <input type="text" id="name" name="name" v-model="name" required />
        <br />
        <label id="email">Email</label>
        <input type="email" id="email" name="email" v-model="email" required />
        <br />
        <p>gender</p>
        <label for="male">Male</label>
        <input
          type="radio"
          name="gender"
          id="male"
          value="male"
          required
          v-model="gender"
        />
        <label for="female">Female</label>
        <input
          type="radio"
          name="gender"
          value="female"
          id="female"
          required
          v-model="gender"
        />
        <label for="other">other</label>
        <input
          id="other"
          type="radio"
          name="gender"
          value="other"
          required
          v-model="gender"
        />
        <br />
        <label for="arrival">arrival</label>
        <input
          type="date"
          id="arrival"
          required
          name="arrival "
          v-model="arrival"
        />
        <br />
        <label for="station">your station: </label>
        <input
          type="text"
          id="station"
          v-model="selectedStation"
          @input="searchStations"
          @blur="clearResults"
          placeholder="Search for a station"
          name="selectedStation"
          required
        />
        <br />
        <ul v-if="showResults">
          <li
            v-for="(station, index) in filteredStations"
            :key="index"
            @click="selectStation(station)"
          >
            {{ station }}
          </li>
        </ul>

        <label for="goingTo">Going to:</label>
        <input
          type="text"
          id="goingTo"
          name="selectedStation2"
          v-model="selectedStation2"
          @input="searchStations2"
          @blur="clearResults2"
          placeholder="Search for a station"
          required
        />
        <ul v-if="showResults2">
          <li
            v-for="(station, index) in filteredStations2"
            :key="index"
            @click="selectStation2(station)"
          >
            {{ station }}
          </li>
        </ul>

        <input
          v-on:click.prevent="submitSecondForm"
          type="submit"
          id="submit-button"
          value="submit"
        />
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data: function () {
    return {
      selectedStation: "",
      selectedStation2: "",
      stationList: [
        "station 1",
        "Station 2",
        "Station 3",
        "Station 4",
        "Station 5",
      ], // Replace with your actual station list
      showResults: false,

      name: "",
      gender: "",
      arrival: "",
      email: "",
      loading: false,
      error: null,
    };
  },
  computed: {
    filteredStations() {
      const query = this.selectedStation.toLowerCase();
      return this.stationList.filter((station) =>
        station.toLowerCase().includes(query)
      );
    },
    filteredStations2() {
      const query = this.selectedStation2.toLowerCase();
      return this.stationList.filter((station) =>
        station.toLowerCase().includes(query)
      );
    },
  },
  methods: {
    searchStations() {
      this.showResults = true;
    },
    selectStation(station) {
      this.selectedStation = station;
      this.showResults = false;
    },
    clearResults() {
      this.showResults = false;
    },
    submitForm() {
      // Handle form submission here, including the selected station
      console.log("Selected station:", this.selectedStation);

      // Additional form submission logic
    },
    searchStations2() {
      this.showResults2 = true;
    },
    selectStation2(station) {
      this.selectedStation2 = station;
      this.showResults2 = false;
    },
    clearResults2() {
      this.showResults2 = false;
    },
    submitSecondForm: async function () {
      this.loading = true;
      this.error = null;
      try {
        let c = await axios.post("http://127.0.0.1:8000/api/secondData", {
          name: this.name,
          email: this.email,
          gender: this.gender,
          arrival: this.arrival,
          selectedStation: this.selectedStation,
          selectedStation2: this.selectedStation2,
        });
      } catch (error) {
        console.error(error);
        this.error = error;
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
<style scoped>
#details {
  background-color: #fff5e0; /* Light yellow */
  padding: 20px;
  border-radius: 10px; /* Rounded corners */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
}

#heading h1 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

#form label,
#form p,
#form input,
#form ul {
  margin-bottom: 10px;
}

/* Style the search results dropdown */
ul {
  list-style: none;
  padding: 0;
  max-height: 100px;
  overflow-y: auto;
  border: 1px solid blue;
  border-radius: 5px;
}

li {
  cursor: pointer;
}

/* Set a hover effect for the list items in the dropdown */
li:hover {
  background-color: lightblue;
}
#submit-button {
  background-color: rgb(76, 125, 103);
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s;
}

#submit-button:hover {
  background-color: rgb(6, 247, 139);
}
</style>