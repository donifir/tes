import { ScrollView, StyleSheet, Text, TouchableOpacity, View } from 'react-native'
import React, { useEffect, useState } from 'react'
import { ListItem } from "@react-native-material/core";
import { FontAwesomeIcon } from '@fortawesome/react-native-fontawesome';
import { faPlus } from '@fortawesome/free-solid-svg-icons';
import axios from 'axios';

export default function Pendaftaran({navigation}) {
  const [datas, setDatas] = useState([])
  
  async function getData() {
    try {
      const response = await axios.get('/data-pendaftaran-sekolah');
      console.log(response.data.data);
      setDatas(response.data.data)
    } catch (error) {
      console.error(error);
    }
  }

  useEffect(() => {
    getData()
  }, [])


  return (
    <View style={styles.container}>
      <ScrollView>
        {datas.map((data) =>
          <ListItem
            key={data.id}
            title={data.nama_sekolah}
            secondaryText={data.nama_provinsi}
            onPress={() => navigation.navigate('Detail Data Sekolah',{itemId: data.id})}
          />
        )}

      </ScrollView>
      <View style={styles.wrapperPlusBtn}>
        <TouchableOpacity onPress={() => navigation.navigate('Pendaftaran Data Sekolah')}>
          <FontAwesomeIcon icon={faPlus} color="white" size={25} />
        </TouchableOpacity>
      </View>
    </View>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: 'white'
  },
  wrapperPlusBtn: {
    position: 'absolute',
    width: 50,
    height: 50,
    backgroundColor: 'black',
    bottom: 10,
    right: 10,
    borderRadius: 50 / 2,
    justifyContent: 'center',
    alignItems: 'center',
  }
})