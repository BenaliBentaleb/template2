import Vuex from 'vuex'
import Vue from 'vue'


Vue.use(Vuex)



export const store = new Vuex.Store({

    state: {

        publications: [],
        likes: [],
        likedBy: [],
        nots: [],
        chats:'',
        onlineUsers: ""



    },


    getters: {
        all_nots(state) {

            return state.nots;
        },

        all_nots_count(state) {

            return state.nots.length;
        },

        

        allPublications(state) {
            return state.publications;
        },

        allLikes(state) {
            return state.likes;
        },

        likedBy(state) {
            return state.likedBy;
        },

        getchats(state) {
            return state.chats;
        }

    },


    mutations: {

        add_not(state, not) {
            state.nots.push(not)
        },
        addPublication(state, value) {
            state.publications.push(value);
        },

        addLike(state, value) {
            state.likes.push(value);
        },

        addLiker(state, value) {
            state.likedBy.push(value);
        }



    }


});