var Constants = {
    get_api_base_url: function () {
      if (location.hostname == "localhost") {
        return "http://localhost/TechSpot/backend/";
      } else {
        return "https://dolphin-app-m354a.ondigitalocean.app/backend/";
      }
    },
  };