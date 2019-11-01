/* eslint-disable no-undef */
/* eslint-disable no-console */
import axios from 'axios';

const methods = [
    'get',
    'post',
    'put',
    'delete',
];

export default class fetchAxios {
    constructor(options = {}) {
        this.options = options;

        if (!options.restURL)
            throw new Error('restURL option is required');

        if (!options.restNonce)
            throw new Error('restNonce option is required');

        methods.forEach(method => {
            this[method] = this._setup(method);
        });
    }

    _setup(method) {
        return (endpoint = '/', data = false) => {
            let fetchObject = {
                credentials: 'same-origin',
                method: method,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': this.options.restNonce,
                }
            };

            if (data) {
                fetchObject.body = JSON.stringify(data);
            }
            // eslint-disable-next-line no-console



            return axios(this.options.restURL + endpoint, fetchObject)
                .then(response => {
                    return response.json().then(json => {
                        return response.ok ? json : Promise.reject(json);
                    });
                });

        }
    }
}