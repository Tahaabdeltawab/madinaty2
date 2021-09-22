import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
    place: {
        details: {},
        products: [],
        services: [],
        offers: [],
        aboutus: [],
    },
}

// getters
export const getters = {
    place: state => state.place,
}

// mutations
export const mutations = {
    [types.FETCH_PLACE_SUCCESS](state, { place }) {
        state.place.details = place.place_details
        state.place.details.isFavorite = place.place_details.isFavorite === "true"
        state.place.products = place.products
        state.place.services = place.place_services
        state.place.offers = place.offers
        state.place.aboutus = place.aboutUs
    },
    [types.TOGGLE_FAV_SUCCESS](state) {
        state.place.details.isFavorite = !state.place.details.isFavorite;
    },
}

// actions
export const actions = {
    async fetchPlace({ commit }, { id }) {
        try {
            const { data } = await axios.get('/api/show_place_details?place_id=' + id)
            commit(types.FETCH_PLACE_SUCCESS, { place: data.data })
        } catch (e) {
            // commit(types.FETCH_PLACE_FAILURE)
        }
    },
    async toggleFav({ commit }, { id }) {
        try {
            // commit(types.TOGGLE_FAV_SUCCESS)
            await axios.get('/api/add_favorite?place_id=' + id)
            commit(types.TOGGLE_FAV_SUCCESS)
        } catch (e) {
            // commit(types.TOGGLE_FAV_FAILURE)
        }
    },
}