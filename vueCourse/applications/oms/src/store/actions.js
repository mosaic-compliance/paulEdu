import * as types from './mutation-type.js'

export const addOrganization=({commit},fields)=>{
    commit(types.ADD_ORGANIZATION, fields)
};
export const loadOrganization=({commit},orgs)=>{
    commit(types.LOAD_ORGANIZATION, orgs)
};