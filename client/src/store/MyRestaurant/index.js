export default {
    namespaced: true,
    state: {
        categoriesWithProducts: [],
        categories: [],
        products: [],
        loading: false,
        error: null,
    },
    mutations: {
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
        fetchCategoriesWithProducts({ commit }) {
            // Product name MUST have "name" as key.
            const categoriesWithProducts = [
                {
                    id: 0,
                    name: "Huvudrätter",
                    children: [
                        { id: 0, imageUrl: "a", categoryId: 0, typeId: 0, name: "Spaghetti Bolognese", active: false, price: 95, rating: 3, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                        { id: 1, imageUrl: "a", categoryId: 0, typeId: 0, name: "Spetta med Citronsås", active: true, price: 89, rating: 4, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                        { id: 2, imageUrl: "a", categoryId: 0, typeId: 0, name: "Oxfilé med klyftpotatis och sås", active: true, price: 120, rating: 1, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                    ],
                },
                {
                    id: 1,
                    name: "Efterrätter",
                    children: [
                        { id: 3, imageUrl: "a", categoryId: 1, typeId: 0, name: "Kladdkaka med grädde", active: false, price: 110, rating: 5, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                        { id: 4, imageUrl: "a", categoryId: 1, typeId: 0, name: "Rabarberpaj", active: false, price: 85, rating: 3, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel" },
                        { id: 5, imageUrl: "a", categoryId: 1, typeId: 0, name: "Maräng med colaglass", active: true, price: 180, rating: 2, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                    ],
                },
                {
                    id: 2,
                    name: "Dryck",
                    children: [
                        { id: 6, imageUrl: "a", categoryId: 2, typeId: 1, name: "Coca-Cola Zero", active: false, price: 15, rating: 5, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                        { id: 7, imageUrl: "a", categoryId: 2, typeId: 1, name: "Coca-Cola", active: false, price: 15, rating: 5, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
                        { id: 8, imageUrl: "a", categoryId: 2, typeId: 1, name: "Norrlands Guld 2.5%", active: true, price: 25, rating: 5, description: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero dolor dignissimos aliquid soluta et. Pariatur, sapiente doloribus eveniet officiis deleniti totam, illum odit veniam itaque soluta rem ex ipsum vel. Deserunt cupiditate, soluta consequuntur ut aliquid at numquam et sunt vel"},
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
                { id: 0, categoryId: 0, typeId: 0, title: "Spaghetti Bolognese", price: 95, rating: 3, active: false },
                { id: 1, categoryId: 0, typeId: 0, title: "Spetta med Citronsås", price: 89, rating: 4, active: true },
                { id: 2, categoryId: 0, typeId: 0, title: "Oxfilé med klyftpotatis och sås", price: 120, rating: 1, active: true },
                { id: 3, categoryId: 1, typeId: 0, title: "Kladdkaka med grädde", price: 110, rating: 5, active: false },
                { id: 4, categoryId: 1, typeId: 0, title: "Rabarberpaj", price: 85, rating: 3, active: false },
                { id: 5, categoryId: 1, typeId: 0, title: "Maräng med colaglass", price: 180, rating: 2, active: true },
                { id: 6, categoryId: 2, typeId: 1, title: "Coca-Cola Zero", price: 15, rating: 5, active: false },
                { id: 7, categoryId: 2, typeId: 1, title: "Coca-Cola", price: 15, rating: 5, active: false },
                { id: 8, categoryId: 2, typeId: 1, title: "Norrlands Guld 2.5%", price: 25, rating: 5, active: true },
            ];
            commit("setProducts", products);
        }
    },
    getters: {
        getCategoriesWithProducts: (state) => {
            return state.categoriesWithProducts;
        },
    },
};
