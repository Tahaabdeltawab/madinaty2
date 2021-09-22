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
        state.sliders = home.Slider || state.sliders
        state.categories = home.all_category || state.categories
        state.populars = home.popular_section || state.populars
        state.subcategories = home.subcategory || state.subcategories
    },
}

// actions
export const actions = {
    async fetchHome({ commit }, {area_id, needs}) {
        try {
            const { data } = await axios.get('/api/Home?area_id=' + area_id + (needs ? '&needs=' + needs : ''))
            commit(types.FETCH_HOME_SUCCESS, { home: data.data })
        } catch (e) {
            // commit(types.FETCH_HOME_FAILURE)
        }
    },
}