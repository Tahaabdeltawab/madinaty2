import * as types from '../mutation-types'

// state
export const state = {
    wait: false,
}

// getters
export const getters = {
    wait: state => state.wait,
}

// mutations
export const mutations = {
    [types.CHANGE_WAIT](state, { wait }) {
        state.wait = wait
    },
}

// actions
export const actions = {
    changeWait({ commit }, { wait }) {
        try {
            commit(types.CHANGE_WAIT, { wait: wait })
        } catch (e) {}
    },
}