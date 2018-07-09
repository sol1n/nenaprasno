function fillUserFields(control, store) {
    const sexFieldName = "t1-p1-s1-g1-c1",
        ageFieldName = "t1-p3-s2-g1-c1",
        regionFieldName = "reg1",
        sexFieldPrefill = store.state.userProfile.data.sex,
        ageFieldPrefill = store.state.userProfile.data.birthdate,
        regionFieldPrefill = store.state.userProfile.data.regionId;


    if (control.controlId === sexFieldName && sexFieldPrefill !== null) {
        store.commit('setControlValue', {
            id: control.controlId,
            value: store.state.userProfile.data.sex
        });

        console.log("Sex set as: " + control.value);
    }

    if (control.controlId === regionFieldName && regionFieldPrefill !== null) {
        if (store.state.userProfile.data.regionId) {
            let foundRegion = store.state.regions.find(region => {
               return region.id === store.state.userProfile.data.regionId;
            });
            store.commit('setControlValue', {
                id: control.controlId,
                value: foundRegion ? foundRegion.value : null
            });

            console.log("Region set as: " + foundRegion.title + " " + foundRegion.value);
        }
    }

    if (control.controlId === ageFieldName && ageFieldPrefill !== null) {
        let bdate = store.state.userProfile.data.birthdate;
        if (bdate) {
            let ageDifMs = Date.now() - new Date(bdate).getTime();
            let ageDate = new Date(ageDifMs); // miliseconds from epoch;
            let age = Math.abs(ageDate.getUTCFullYear() - 1970);
            store.commit('setControlValue', {
                id: control.controlId,
                value: age
            });

            console.log("Age set as: " + age);
        }
    }
}

module.exports = fillUserFields;