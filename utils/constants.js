var Constants = {
    get_api_base_url: function () {
      if (location.hostname == "localhost") {
        return "http://localhost/TechSpot/backend/";
      } else {
        return "https://walrus-app-dere7.ondigitalocean.app/dentist-backend/";
      }
    },
  };