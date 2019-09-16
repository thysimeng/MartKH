<template>
  <div>
    {{ templateID }}
    <!-- {{ templateid[0].template_id }} -->
    <div v-for="id in templateid" :data="id" :key="id.key">
      <templateSlide1 v-if="id.template_id==1" :templateid="templateid"></templateSlide1>
      <h1 v-if="id.template_id==2">Hello template 2</h1>
      <h1 v-if="id.template_id==3">Hello template 3</h1>
    </div>
    <!-- <templateSlide2></templateSlide2> -->

  </div>
</template>

<script>
import templateSlide1 from "./templateSlide/templateSlide1.vue";
import templateSlide2 from "./templateSlide/templateSlide2.vue";
export default {
  name: "slideShow",
  data() {
    return {
      templateid: []
    };
  },
  components: {
    templateSlide1,
    templateSlide2
  },
  computed: {
    templateID() {
      let currentObj = this;
      axios
        .get("/slidetemplateID", {})
        .then(function(response) {
          currentObj.templateid = response.data;
        })
        .catch(function(error) {
          currentObj.templateid = error;
        });
    }
  }
};
</script>
