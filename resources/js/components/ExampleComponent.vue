<template>
    <Row style="width:620px;margin:200px auto 0;">
        <Col span="8" style="width: 200px">
            <Select v-model="province" @on-change="getRegion(province,2)">
                <Option v-for="item in provinceList" :value="item.id" :key="item.id">{{ item.name }}</Option>
            </Select>
        </Col>
        <Col span="8" style="padding:0 10px;width: 200px">
            <Select v-model="city" @on-change="getRegion(city,3)">
                <Option v-for="item in cityList" :value="item.id" :key="item.id">{{ item.name }}</Option>
            </Select>
        </Col>
        <Col span="8" style="width: 200px">
            <Select v-model="dist">
                <Option v-for="item in distList" :value="item.id" :key="item.id">{{ item.name }}</Option>
            </Select>
        </Col>
    </Row>
</template>
<script>
    import axios from 'axios';
    var baseURL = 'http://59.110.153.91:2226/api';
    var instance = axios.create({
        baseURL: baseURL,
        timeout: 10000,
        headers: {}
    });

    export default {
        data () {
            return {
                provinceList: [],
                cityList: [],
                distList: [],
                province: '',
                city: '',
                dist: '',
            }
        },
        mounted() {
            this.getRegion(0,1)
        },
        methods: {
            getRegion (pid,level) {
                var that = this
                instance.get('region', {
                    params: {
                        pid: pid
                    }
                })
                .then(function (response) {
                    var data = response.data.data;
                    switch (level) {
                        case 1:
                            that.provinceList = data;
                            that.cityList = [];
                            that.distList = [];
                            break;
                        case 2:
                            that.cityList = data;
                            that.distList = [];
                            break;
                        case 3:
                            that.distList = data;
                            break;
                    }
                })
                .catch(function (error) {
                    that.$Message.info('Msg:'+error);
                });
            }
        }
    }
</script>