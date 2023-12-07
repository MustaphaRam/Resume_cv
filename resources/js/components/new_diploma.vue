<template>
    <div class="fnXcmN">
        <div class="jEQib eSepnq">
            <p class="ignblp showetu" id="id"></p>
            <div class="bfNMLE">
                <button class="eNmQca kbFMmR remove">
                    <ion-icon name="close-circle-outline"></ion-icon>
                </button>
                <button class="eNmQca kbFMmR ikHWQs">
                    <ion-icon name="chevron-up-outline"></ion-icon>
                </button>
            </div>
        </div>
        <div class="set">
            <div class="row py-2">
                <div class="col-md-6 py-1">
                    <label class="labels">Certificate Name</label>
                    <input v-model="fields.certificate" name="certificate[]" class= "form-control" pattern="^[a-zA-Z0-9 -+]{3,30}$" >
                    <span style="color:red;"></span>
                </div>
                <div class="col-md-6 py-1">
                    <label class="labels">Institution Name</label>
                    <input v-model="fields.institute_name" name="institute_name[]" class= "form-control inst_name" pattern="^[a-zA-Z0-9 -]{3,30}$">
                    <span style="color:red;"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 py-1">
                    <label class="labels">Specialty</label>
                    <input v-model="fields.Specialty_name" name="Specialty_name[]" class = "form-control specialty" pattern="^[a-zA-Z0-9 -]{3,30}$">
                    <span style="color:red;"></span>
                </div>
                <div class="col-md-6 py-1">
                    <label class="labels">Date Obtaining</label>
                    <select v-model="fields.date_obtaining" name="date_obtaining[]" class= "form-control">
                        <option v-for="year in availableYears" :key="year" :value="year">{{ year }}</option>
                    </select>
                    <span style="color:red;"></span>
                </div>
            </div>
            <div class="col-md-12 py-1">
                <label class="labels">Description</label>
                <textarea v-model="fields.description" name="description[]"  maxlength="130" class ="form-control other_info"></textarea>
                <span style="color:red;"></span>
            </div>
        </div>
        <div class="dxqSpv">
            
        </div>
    </div>
</template>
<script>

export default{
    data() {
        return {
            fields: {}
        }
    },
    props: {
        identifier: String,
    },
    methods: {
        sendDataToParent() {
            console.log('Child component data:', this.fields);
            this.$emit('childData', { identifier: this.identifier, data: this.fields });
        },
    },
    computed: {
        availableYears() {
            const currentYear = new Date().getFullYear();
            const years = [];

            for (let year = currentYear; year >= currentYear - 50; year--) {
                years.push(year);
            }
            return years;
        },
    },
}
</script>
