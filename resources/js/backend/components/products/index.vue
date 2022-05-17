<template>
  <div class="card animated fadeIn">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <form class="form-inline">
            <div class="form-group">
              <label for="">Filter By :</label>
              <select class="form-control ml-2" v-model="filter">
                <option selected value="">Choose...</option>
                <option value="author_name">Authort name</option>
                <option value="product_name">Pruduct name</option>
                <option value="created_at">Date</option>
              </select>

              <input
                type="text"
                class="form-control ml-2"
                name=""
                id=""
                aria-describedby="helpId"
                placeholder="Search here..."
                v-model="search"
              />
            </div>
          </form>
        </div>
        <div class="col-md-12 mt-3">
          <table class="table">
            <thead>
              <tr>
                <th>Author name</th>
                <th>Product name</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in items" :key="index">
                <td>
                  <strong> {{ item.author_name }}</strong>
                </td>
                <td>
                  {{ item.product_name }}
                </td>
                <td>
                  {{ item.created_at }}
                </td>
              </tr>

              <tr v-if="items.length == 0">
                <td colspan="3" align="center" class="text-danger">
                  No Data found!
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- <b-table striped hover :items="items"></b-table> -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      fields: [],
      filter: "",
      search: "",
    };
  },
  watch: {
    filter(value) {
      // this.filter = value == '1' ? 'author_name' : ""
      this.load_products();
    },
    search() {
      this.load_products();
    },
  },
  mounted() {
    this.load_products();
  },
  methods: {
    load_products() {
      let params = {
        filter: this.filter,
        search: this.search,
      };
      axios.get("/api/products", { params }).then((resp) => {
        this.items = resp.data;
        // console.log(resp.data);
      });
    },
  },
};
</script>

<style>
</style>