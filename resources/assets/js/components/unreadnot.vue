<template>

    <li>
        <a href="/notifications">
            Unread notification
            <span class="badge"> {{ all_nots_count }} </span>
        </a>
    </li>

</template>



<script>
export default {
  mounted() {
    this.get_unread();
  },

  methods: {
    get_unread() {
      axios.get("/get_unreadnot").then(response => {
        console.log(response);

        response.data.forEach(not => {
          // commit --- pour get a mutation data in store.js
          this.$store.commit("add_not", not);
        });
      });
    }
  },
  computed: {
    all_nots_count() {
      return this.$store.getters.all_nots_count;
    }
  }
};
</script>