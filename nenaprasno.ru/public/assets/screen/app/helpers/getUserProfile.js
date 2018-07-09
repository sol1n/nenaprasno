const config = require('../config'),
    userAPI = require('../api/user');

function getUserProfile($store) {
    return new Promise((resolve, reject) => {
        let userId = $store.state.user.userId || $store.state.user.id,
            token = $store.state.user.sessionId;

        userAPI.getProfiles(token, userId)
            .then(response => {
                let fundProfile = response.data.find(profile => {
                    return profile.schemaId === config.userProfileName;
                });

                if (fundProfile) {
                    userAPI.getProfile(token, fundProfile.itemId)
                        .then(result => {
                            $store.commit('setUserProfileData', result.data);
                            resolve(result.data);
                        })
                        .catch(error => {
                            reject(error);
                            console.log (error);
                        });
                } else {
                    userAPI.assignProfile(token, config.userProfileName, { userId: userId })
                        .then(result => {
                            $store.commit('setUserProfileData', result.data);
                            resolve(result.data);
                        })
                        .catch(error => {
                            reject(error);
                        });
                }
            })
            .catch(error => {
                reject(error);
            });
    });
}

module.exports = getUserProfile;
