import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
    sliders: [],
    categories: [],
    populars: [],
    subcategories: [],
}

// getters
export const getters = {
    sliders: state => state.sliders,
    categories: state => state.categories,
    populars: state => state.populars,
    subcategories: state => state.subcategories,
}

// mutations
export const mutations = {
    [types.FETCH_HOME_SUCCESS](state, { home }) {
        state.sliders = home.Slider
        state.categories = home.all_category
        state.populars = home.popular_section
        state.subcategories = home.subcategory
    },
}

// actions
export const actions = {
    async fetchHome({ commit }) {
        try {
            const { data } = await axios.get('/api/Home')
            console.log(data.data);
            commit(types.FETCH_HOME_SUCCESS, { home: data.data })
        } catch (e) {
            // commit(types.FETCH_HOME_FAILURE)
        }
    },
}