import { StyleSheet, Text, View } from 'react-native'
import React from 'react'
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Pendaftaran from '../screen/listData';
import axios from 'axios';
import CreatePendaftaran from '../screen/createData';
import DetailDataSekolah from '../screen/detail';

export default function Routes() {
  const Stack = createNativeStackNavigator();
  axios.defaults.baseURL = 'http://192.168.91.11:8000/api';
  return (
    <Stack.Navigator>
      <Stack.Screen name="List Data" component={Pendaftaran} />
      <Stack.Screen name="Pendaftaran Data Sekolah" component={CreatePendaftaran} />
      <Stack.Screen name="Detail Data Sekolah" component={DetailDataSekolah} />
    </Stack.Navigator>
  )
}

const styles = StyleSheet.create({
  
})