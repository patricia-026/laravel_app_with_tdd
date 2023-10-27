/*class BirdboardForm {

    constructor(data) {
        this.originalData = JSON.parse(JSON.stringify(data));

        Object.assign(this, data);

        this.errors = {};
    }

    data() {
        let data = {};

        //originalData: { title: 'Title', ...}
        for (let attribute in this.originalData) {
            data[attribute] = this[attribute];
        }

        return data;
    }

    submit(endpoint) {
        return axios.post(endpoint, this.data())
            .catch(this.onFail.bind(this));
    }

    onFail(error) {
        Object.assign(this.errors, error.response.data.errors);
        console.log(this.errors);
        //console.log(error.response.data.errors);
        /*this.errors = error.response.data.errors;
        console.log(this.errors);*/
/*}

}

export default BirdboardForm;*/


class BirdboardForm {
    constructor(data) {
        this.originalData = JSON.parse(JSON.stringify(data));

        Object.assign(this, data);

        this.errors = {};
        this.submitted = false;
    }

    data() {
        return Object.keys(this.originalData).reduce((data, attribute) => {
            data[attribute] = this[attribute];

            return data;
        }, {});
    }

    post(endpoint) {
        return this.submit(endpoint);
    }

    patch(endpoint) {
        return this.submit(endpoint, 'patch');
    }

    delete(endpoint) {
        return this.submit(endpoint, 'delete');
    }

    submit(endpoint, requestType = 'post') {
        return axios[requestType](endpoint, this.data())
            .catch(this.onFail.bind(this))
            .then(this.onSuccess.bind(this));
    }

    onSuccess(response) {
        this.submitted = true;
        this.errors = {};

        return response;
    }

    onFail(error) {
        this.errors = error.response.data.errors;
        this.submitted = false;

        throw error;
    }

    reset() {
        Object.assign(this, this.originalData);
    }
}

export default BirdboardForm;