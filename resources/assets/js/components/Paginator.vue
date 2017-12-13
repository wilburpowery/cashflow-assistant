<template>
    <ul class="pagination" v-if="showPagination">
      <li>
        <a href="#" aria-label="Previous" @click.prevent="page--" v-show="prevUrl">
          <span aria-hidden="true">&laquo; Previous</span>
      </a>
  </li>
  <li>
    <a href="#" aria-label="Next" @click.prevent="page++" v-show="nextUrl">
      <span aria-hidden="true">Next &raquo;</span>
  </a>
</li>
</ul>
</template>

<script>
export default {
  props: ['dataSet'],

  data() {
      return {
          page: 1,
          prevUrl: false,
          nextUrl: false,
      }
  },

  watch: {
      dataSet() {
          this.page = this.dataSet.current_page;
          this.prevUrl = this.dataSet.prev_page_url;
          this.nextUrl = this.dataSet.next_page_url;
      },

      page() {
          this.broadcast().updateUrl();
      }
  },

  computed: {
      showPagination() {
          return !! this.prevUrl || !! this.nextUrl;
      }
  },

  methods: {
      broadcast() {
          return this.$emit('changed', this.page);
      },
      updateUrl() {
          history.pushState(null, null, `?page=${this.page}`);
      }
  }
}
</script>