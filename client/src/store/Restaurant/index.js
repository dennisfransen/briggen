
export default {
    namespaced: true,
    state: {
      restaurant: {},
      categoriesWithProducts: [],
      categories: [],
      products: [],
      loading: false,
      error: null,
    },
    mutations: {
      setRestaurant(state, payload) {
        state.restaurant = payload;
      },
      setCategoriesWithProducts(state, payload) {
        state.categoriesWithProducts = payload;
      },
      setCategories(state, payload) {
        state.products = payload;
      },
      setProducts(state, payload) {
        state.products = payload;
      },
      setLoading(state, payload) {
        state.loading = payload;
      },
      setError(state, payload) {
        state.error = payload;
      },
    },
    actions: {
      fetchRestaurant({ commit }) {
        const restaurant = {
          id: 1,
          title: "Restaurang Briggen",
          description:
            "Lorem ipsum dolor sitamet consectetur adipisicing elit. Dignissimos temporibus dicta quas doloribus molestias reiciendis aut, similique incidunt excepturi vero iste facere modi magnam veritatis neque ut architecto porro impedit, voluptas quos deleniti commodi, dolor quamaliquid. Magni, a eos!",
          rating: 4,
        };
        commit("setRestaurant", restaurant);
      },
      fetchCategoriesWithProducts({ commit }) {
        const categoriesWithProducts = [
          {
            id: 0,
            category: "Huvudrätter",
            products: [
              { id: 0, categoryId: 0, typeId: 0, name: "Spaghetti Bolognese", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 95, rating: 3 },
              { id: 1, categoryId: 0, typeId: 0, name: "Spetta med Citronsås", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 89, rating: 4 },
              { id: 2, categoryId: 0, typeId: 0, name: "Oxfilé med klyftpotatis och sås", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 120, rating: 1 },
            ],
          },
          {
            id: 1,
            category: "Efterrätter",
            products: [
              { id: 3, categoryId: 1, typeId: 0, name: "Kladdkaka med grädde", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 110, rating: 5 },
              { id: 4, categoryId: 1, typeId: 0, name: "Rabarberpaj", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 85, rating: 3 },
              { id: 5, categoryId: 1, typeId: 0, name: "Maräng med colaglass", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 180, rating: 2 },
            ],
          },
          {
            id: 2,
            category: "Dryck",
            products: [
              { id: 6, categoryId: 2, typeId: 1, name: "Coca-Cola Zero", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 15, rating: 5 },
              { id: 7, categoryId: 2, typeId: 1, name: "Coca-Cola", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 15, rating: 5 },
              { id: 8, categoryId: 2, typeId: 1, name: "Norrlands Guld 2.5%", description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel", price: 25, rating: 5 },
            ],
          },
        ];
        commit("setCategoriesWithProducts", categoriesWithProducts);
      },
      fetchCategories({ commit }) {
        const categories = [
          { id: 0, category: "Huvudrätter" },
          { id: 1, category: "Efterrätter" },
        ];
        commit("setCategories", categories);
      },
      fetchProducts({ commit }) {
        const products = [
          { id: 0, categoryId: 0, title: "Spaghetti Bolognese", price: 95, rating: 3 },
          { id: 1, categoryId: 0, title: "Spetta med Citronsås", price: 89, rating: 4 },
          { id: 2, categoryId: 0, title: "Oxfilé med klyftpotatis och sås", price: 120, rating: 1 },
          { id: 3, categoryId: 1, title: "Kladdkaka med grädde", price: 110, rating: 5 },
          { id: 4, categoryId: 1, title: "Rabarberpaj", price: 85, rating: 3 },
          { id: 5, categoryId: 1, title: "Maräng med colaglass", price: 180, rating: 2 },
        ];
        commit("setProducts", products);
      }
    },
    getters: {
      getRestaurant: (state) => {
        return state.restaurant;
      },
      getCategoriesWithProducts: (state) => {
        return state.categoriesWithProducts;
      },
    },
  };
  