import { SafeAreaView, StyleSheet, Text, View } from 'react-native'
import React, { useEffect, useState } from 'react'
import axios from 'axios';

export default function DetailDataSekolah({ route, navigation }) {
  const [datas, setdatas] = useState([])
  const { itemId } = route.params;

  async function getData() {
    try {
      const response = await axios.get(`/data-pendaftaran-sekolah/${itemId}`);
      console.log(response.data.data);
      setdatas(response.data.data)
    } catch (error) {
      console.error(error);
    }
  }

  useEffect(() => {
    getData()
  }, [])
  


  return (
    <SafeAreaView style={styles.container}>
      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Nama Sekolah</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.nama_sekolah}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Tipe Sekolah</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.tipe_sekolah}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Alamat</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.alamat}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Kode Pos</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.kode_pos}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Provinsi</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.nama_provinsi}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Kabupaten / Kota</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.kabupatenkota}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>No Telp</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.no_telp}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Email</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.email_sekolah}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Facebook</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.facebook}</Text>
        </View>
      </View>

      <View style={styles.wrapperContent}>
        <View style={styles.wtext1}>
          <Text style={styles.text}>Jumlah Siswa</Text>
        </View>
        <View style={styles.wtext2}>
          <Text style={styles.text}>:</Text>
        </View>
        <View style={styles.wtext3}>
          <Text style={styles.text}>{datas.jumlah_siswa}</Text>
        </View>
      </View>


    </SafeAreaView>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: 'white'
  },
  wrapperContent: {
    // flex: 1,
    margin: 10,
    flexDirection: 'row'
  },
  text: {
    color: 'black',
    fontSize: 16,
  },
  wtext1: {
    flex: 3,
  },
  wtext2: {
    flex: 1,
  },
  wtext3: {
    flex: 4,
  }
})