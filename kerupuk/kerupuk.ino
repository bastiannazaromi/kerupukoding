#include <Arduino.h>

// Wifi
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
// Buat object Wifi
ESP8266WiFiMulti WiFiMulti;
// Buat object http
HTTPClient http;
#define USE_SERIAL Serial

// Sensor
#define pinSensor A0 // pin z ke AO (multiplexer ke wemos)
int nilaiCahaya = 0;
int nilaiHujan = 0;

#define s0 D4 // di multiplexer ada pin yg namanya S0 - S2
#define s1 D3
#define s2 D2

// Relay
#define relay_on LOW
#define relay_off HIGH
#define motor_menutup D5
#define motor_membuka D6
#define pengering D7

String simpan = "http://duniaiot.com/kerupukcoding/Data/save?cahaya=";
String ambil_data = "http://duniaiot.com/kerupukcoding/Data/data_terakhir";

String respon = "", respon2 = "";
boolean status_pengering = false, data_terakhir = false;

void setup() {
  Serial.begin(115200);   //Komunikasi baud rate

  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(false);

  for(uint8_t t = 4; t > 0; t--) {
      USE_SERIAL.printf("[SETUP] Tunggu %d...\n", t);
      USE_SERIAL.flush();
      delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("Project", "12345678"); // Sesuaikan SSID dan password ini

  for (int u = 1; u <= 5; u++)
  {
    if ((WiFiMulti.run() == WL_CONNECTED))
    {
      USE_SERIAL.println("Alhamdulillah wifi konek");
      USE_SERIAL.flush();
      delay(1000);
    }
    else
    {
      Serial.println("Hmmm wifi belum konek");
      delay(1000);
    }
  }

  pinMode(s0, OUTPUT);
  pinMode(s1, OUTPUT);
  pinMode(s2, OUTPUT);
  pinMode(motor_menutup, OUTPUT);
  pinMode(motor_membuka, OUTPUT);
  pinMode(pengering, OUTPUT);

  digitalWrite(motor_menutup, relay_off);
  digitalWrite(motor_membuka, relay_off);
  digitalWrite(pengering, relay_off);

  delay(1000);
  
}

void loop() {
  
  //memilih y0 sebagai input (Sensor Hujan)
  digitalWrite(s0,LOW);
  digitalWrite(s1,LOW);
  digitalWrite(s2,LOW);
  nilaiHujan = analogRead(pinSensor);

  nilaiHujan = 100 - (nilaiHujan / 10.24);
  
  Serial.print("Curah Hujan : ");
  Serial.print(nilaiHujan);
  Serial.println(" %");
  delay(300);
     
  //memilih y2 sebagai input (Sensor Cahaya)
  digitalWrite(s0,LOW);
  digitalWrite(s1,HIGH);
  digitalWrite(s2,LOW);
  nilaiCahaya = analogRead(pinSensor);

  nilaiCahaya = 100 - (nilaiCahaya / 10.24);
  Serial.print("Intensitas Cahaya : ");
  Serial.print(nilaiCahaya);
  Serial.println(" %");
  delay(300);  

  Serial.println();

  if (data_terakhir == false)
  {
    ambil_data_terakhir();

    if (respon2 == "true")
    {
      status_pengering = true; 
    }

    data_terakhir = true;
  }

  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( simpan + (String) nilaiCahaya + "&hujan=" + (String) + nilaiHujan );
    
    USE_SERIAL.print("[HTTP] Menyimpan ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon = http.getString();
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }

  if (nilaiCahaya <= 50 || nilaiHujan >= 40)
  {
    if (status_pengering == false)
    {
      digitalWrite(motor_menutup, relay_on);
      delay(3500);
      digitalWrite(motor_menutup, relay_off);
      digitalWrite(pengering, relay_on);

      status_pengering = true;
    }
    else
    {
      digitalWrite(pengering, relay_on);
    }
  }
  else
  {
    if (status_pengering == true)
    {
      digitalWrite(motor_membuka, relay_on);
      delay(3500);
      digitalWrite(motor_membuka, relay_off);
      digitalWrite(pengering, relay_off);

      status_pengering = false;
    }
    else
    {
      digitalWrite(pengering, relay_off);
    }
  }

  delay(1000);
  
}

void ambil_data_terakhir()
{
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( ambil_data );
    
    USE_SERIAL.print("[HTTP] Ambil data terakhir ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon2 = http.getString();
        USE_SERIAL.println("Respon : " + respon2);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
}
