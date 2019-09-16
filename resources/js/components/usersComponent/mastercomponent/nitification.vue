<template>
  <div>
    <notifications group="foo" position="bottom left" ignoreDuplicates="true" max="3"/>
  </div>
</template>
<script>
export default {
  name: "Nitification",
  data: function() {
    return {
      addStatus: Boolean
    };
  },
  props: {
    shownitification: Boolean
  },
};
</script>
