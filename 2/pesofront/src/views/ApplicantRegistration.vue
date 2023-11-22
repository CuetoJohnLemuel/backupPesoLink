<template>
    <div>
        <table>
            <tr>
                <th>Full Name</th>
            </tr>
            <tr v-for="info in info">
                <td>{{info.full_name }}</td>

            </tr>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
             info:[],
        }
    },
    created(){
        this.getInfo();
    },
    
    methods:{
        async getInfo(){
            try {
                const inf = await axios.get('getdata');
            this.info = inf.data;
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>