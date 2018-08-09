import * as types from './mutation-type.js'

export const mutations={
    [types.ADD_ORGANIZATION](state, fields){
        state.organization=fields
    },
    [types.LOAD_ORGANIZATION](state,organization_payload){
        state.organization=organization_payload}

    }

