import { Alert, ScrollView, StyleSheet, Text, TouchableOpacity, View } from 'react-native'
import React, { useEffect, useState } from 'react'
import { SafeAreaView } from 'react-native-safe-area-context'
import { TextInput } from "@react-native-material/core";
import axios from 'axios';
import { SelectList } from 'react-native-dropdown-select-list'
import DocumentPicker from 'react-native-document-picker';

const header = {
  headers: {
    'Content-Type': 'multipart/form-data',
    Accept: 'application/json',
  },
};

export default function CreatePendaftaran() {
  const [dataTipeS, setDataTipeS] = useState([])
  const [dataProvinsi, setDataProvinsi] = useState([])
  const [dataKabukota, setDataKabukota] = useState([])
  const [selected, setSelected] = React.useState("");

  const [tipeSekolahId, setTipeSekolahId] = useState('')
  const [provinsiId, setProvinsiId] = useState('')
  const [kabuKotaId, setKabukotaId] = useState('')
  const [namaSekolah, setNamaSekolah] = useState('')
  const [alamat, setAlamat] = useState('')
  const [kodePos, setKodePos] = useState('')
  const [noTelp, setNoTelp] = useState('')
  const [email, setEmail] = useState('')
  const [facebook, setFacebook] = useState('')
  const [jumblahSiswa, setJumblahSiswa] = useState('')
  const [foto, setFoto] = useState('')
  const [singleFile, setSingleFile] = useState(null);

  const [errorMessage, setError] = useState("")

  async function getDataTipeSekolah() {
    try {
      const response = await axios.get('/tipe-sekolah');
      console.log(response.data.data);
      setDataTipeS(response.data.data)
    } catch (error) {
      console.error(error);
    }
  }

  async function getDataProvinsi() {
    try {
      const response = await axios.get('/provinsi');
      console.log(response.data.data);
      setDataProvinsi(response.data.data)
    } catch (error) {
      console.error(error);
    }
  }

  async function getDataKabuKota() {
    try {
      const response = await axios.get('/kabupaten-kota');
      console.log(response.data.data);
      setDataKabukota(response.data.data)
    } catch (error) {
      console.error(error);
    }
  }

  useEffect(() => {
    getDataTipeSekolah()
    getDataProvinsi()
    getDataKabuKota()
  }, [])

  // picker

  // submit
  const btnSubmit = async() => {
    const formData = new FormData()
    formData.append('tipe_sekolah',tipeSekolahId)
    formData.append('nama_sekolah',namaSekolah)
    formData.append('alamat',alamat)
    formData.append('kode_pos',kodePos)
    formData.append('no_telp',noTelp)
    formData.append('provinsi',provinsiId)
    formData.append('kabupatenkota',kabuKotaId)
    formData.append('email_sekolah',email)
    formData.append('jumlah_siswa',jumblahSiswa)

    axios.post('/pendaftaran-sekolah', formData, header)
    .then(function (response) {
      console.log(response.data.data);
      navigation.navigate('List Data')
      Alert.alert('Success', ' Data Berhail Ditambahkan');
    })
    .catch(function (error) {
      console.log(error.response.data.message, 'ini error');
      setError(error.response.data.message)
   
      Alert.alert('Error', JSON.stringify(errorMessage) );
    });
  }


  return (
    <View style={styles.container}>
      <SafeAreaView>
        <ScrollView>
        {console.log(errorMessage,'errormessage')}
          <TextInput label="Nama Sekolah" variant="outlined" style={{ margin: 16 }} color="black" value={namaSekolah} onChangeText={value => setNamaSekolah(value)} />
          <View style={styles.dropdown}>
            <SelectList
              setSelected={(val) => setSelected(val)}
              data={dataTipeS}
              search={false}
              inputStyles={{ color: 'black' }}
              dropdownTextStyles={{ color: 'black' }}
              dropdownStyles={{ margin: 10 }}
              placeholder="Tipe Sekolah"
              // label="Tipe Sekolah"
              onSelect={() => setTipeSekolahId(selected)}

            />
          </View>
          <TextInput label="Alamat" variant="outlined" style={{ margin: 16 }} color="black" value={alamat} onChangeText={value => setAlamat(value)} />
          <TextInput label="Kode Pos" variant="outlined" style={{ margin: 16 }} color="black" value={kodePos} onChangeText={value => setKodePos(value)} />
          <View style={styles.dropdown}>
            <SelectList
              setSelected={(val) => setSelected(val)}
              data={dataProvinsi}
              search={false}
              inputStyles={{ color: 'black' }}
              dropdownTextStyles={{ color: 'black' }}
              dropdownStyles={{ margin: 10 }}
              // label="Tipe Sekolah"
              placeholder="Provinsi"
              onSelect={() => setProvinsiId(selected)}
            />
          </View>
          <View style={styles.dropdown}>
            <SelectList
              setSelected={(val) => setSelected(val)}
              data={dataKabukota}
              search={false}
              inputStyles={{ color: 'black' }}
              dropdownTextStyles={{ color: 'black' }}
              dropdownStyles={{ margin: 10 }}
              // label="Tipe Sekolah"
              placeholder="Kabupaten / Kota"
              onSelect={() => setKabukotaId(selected)}
            />
          </View>
          <TextInput label="No Telpon Sekolah" variant="outlined" style={{ margin: 16 }} color="black" value={noTelp} onChangeText={value => setNoTelp(value)} keyboardType={'numeric'} />
          <TextInput label="Email Sekolah" variant="outlined" style={{ margin: 16 }} color="black" value={email} onChangeText={value => setEmail(value)} />
          <TextInput label="Facebook" variant="outlined" style={{ margin: 16 }} color="black" value={facebook} onChangeText={value => setFacebook(value)} />
          <TextInput label="Jumlah Siswa" variant="outlined" style={{ margin: 16 }} color="black" value={jumblahSiswa} onChangeText={value => setJumblahSiswa(value)} keyboardType={'numeric'} />

          <TouchableOpacity style={styles.wrapperBtnSubmit} onPress={btnSubmit}>
            <View style={styles.wrapperBtn}>
              <Text style={styles.text}>Sybmit</Text>
            </View>
          </TouchableOpacity>
        </ScrollView>
      </SafeAreaView>
    </View>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: 'white'
  },
  wrapperBtnSubmit: {
    // backgroundColor:'black',
    // width: '90%',
    justifyContent: 'center',
    alignItems: 'center',
    marginBottom: 40,
  },
  wrapperBtn: {
    backgroundColor: 'black',
    width: 260,
    height: 40,
    justifyContent: 'center',
    alignItems: 'center',
    borderRadius: 20,
  },
  text: {
    fontSize: 16,
    color: 'white'
  },
  dropdown: {
    margin: 16,
  },
  buttonStyle: {
    backgroundColor: '#307ecc',
    borderWidth: 0,
    color: '#FFFFFF',
    borderColor: '#307ecc',
    height: 40,
    alignItems: 'center',
    borderRadius: 5,
    marginTop: 15,
  },
  buttonTextStyle: {
    color: '#FFFFFF',
    paddingVertical: 10,
    fontSize: 16,
  },
})