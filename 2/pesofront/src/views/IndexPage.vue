<template>
    <div>
        <table border="1">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Address</th>
                <th>Email</th>
            </tr>
            <tr v-for = "info in info">
                <td>{{info.username}}</td>
                <td>{{info.password}}</td>
                <td>{{info.address}}</td>
                <td>{{info.email}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
export default{
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