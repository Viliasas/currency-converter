<template>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Currency Converter</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow relative sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="#" method="POST"
                      @submit.prevent="convert">
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                        <div class="mt-1">
                            <input id="amount" name="amount" type="number" autocomplete="email" required="required"
                                   step="0.01"
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   v-model="input.amount"/>
                        </div>
                    </div>

                    <div>
                        <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                        <select id="currency" name="currency"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                v-model="input.currency">
                            <template v-for="currency in input.currencies"
                                      :key="currency">
                                <option :value="currency"
                                        :selected="currency === input.currency"
                                        v-text="currency"/>
                            </template>
                        </select>
                    </div>

                    <div>
                        <label for="crypto" class="block text-sm font-medium text-gray-700">Crypto</label>
                        <div class="mt-1">
                            <input id="crypto" name="crypto" type="text"
                                   required="required"
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   v-model="input.crypto"/>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Convert
                        </button>
                    </div>
                </form>
                <div class="mt-6"
                     v-if="data.conversion">
                    <div class="w-full border-t border-gray-300"/>
                    <div class="mt-6">
                        For <strong>{{ data.conversion.amount }} {{ data.conversion.from }}</strong> you will get
                        <strong>{{ data.conversion.result }} {{ data.conversion.to }}</strong>.
                    </div>
                    <div class="mt-6">
                        Current exchange rate is <strong>{{ data.conversion.exchangeRate }} {{
                            data.conversion.to
                        }}</strong> for <strong>1
                        {{ data.conversion.from }}</strong>.
                    </div>
                </div>
                <Loading :active="isLoading"
                         :is-full-page="false"
                         color="#4F46E5"/>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from 'vue-loading-overlay';
import { nextTick, reactive, ref } from 'vue';
import axios from 'axios';

const Swal = require('sweetalert2');

export default {
    name: 'CurrencyConverter',
    components: {
        Loading,
    },
    setup() {
        // Data
        const isLoading = ref(false);
        const data = reactive({
            conversion: null,
        });
        const input = reactive({
            amount: 0.0,
            currency: 'EUR',
            currencies: ['EUR', 'USD', 'PLN'],
            crypto: '',
        });

        // Methods
        const convert = () => {
            isLoading.value = true;

            data.conversion = null;

            axios.post('/api/crypto/convert', input)
                .then(response => {
                    data.conversion = response.data.data;
                })
                .catch(error => {
                    const message = (typeof error.response !== 'undefined') ? error.response.data.message : error.message;

                    Swal.fire({
                        title: 'Error!',
                        text: message,
                        icon: 'error',
                    });
                })
                .finally(_ => {
                    nextTick(_ => {
                        isLoading.value = false;
                    });
                });
        };

        return {
            isLoading,
            data,
            input,
            convert,
        };
    },
};
</script>
