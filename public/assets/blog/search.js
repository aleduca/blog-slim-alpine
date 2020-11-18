// @ts-nocheck
function search() {
  return {
    searchPost: "",
    posts: [],

    truncate(text, limit, pad = "...") {
      const textStriped = text.replace(/(<([^>]+)>)/gi, "");
      return textStriped.length > limit
        ? textStriped.slice(0, limit) + pad
        : text;
    },

    search: _.debounce(async function () {
      try {
        const { data } = await axios.get("/api/search", {
          params: {
            search: this.searchPost,
          },
        });

        this.posts = data;

        const notFound = this.$refs.notFound;

        this.posts.length <= 0
          ? (notFound.innerHTML = "Nenhum post encontrado")
          : (notFound.innerHTML = "");

        console.log(data);
      } catch (error) {
        console.log(error);
      }
    }, 500),

    async init() {
      try {
        const { data } = await axios.get("/api/posts");

        this.posts = data;
      } catch (error) {
        console.log(error);
      }
    },
  };
}
