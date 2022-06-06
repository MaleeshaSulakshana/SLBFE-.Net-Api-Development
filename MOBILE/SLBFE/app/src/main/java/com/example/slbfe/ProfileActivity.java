package com.example.slbfe;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.EditText;

public class ProfileActivity extends AppCompatActivity {

    private EditText name, age, email, address, contact, nic, profession, affiliation, qualifications, latitude, longitude;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        name = (EditText) this.findViewById(R.id.name);
        age = (EditText) this.findViewById(R.id.age);
        email = (EditText) this.findViewById(R.id.email);
        address = (EditText) this.findViewById(R.id.address);
        contact = (EditText) this.findViewById(R.id.contact);
        nic = (EditText) this.findViewById(R.id.nic);
        profession = (EditText) this.findViewById(R.id.profession);
        affiliation = (EditText) this.findViewById(R.id.affiliation);
        qualifications = (EditText) this.findViewById(R.id.qualifications);
        latitude = (EditText) this.findViewById(R.id.latitude);
        longitude = (EditText) this.findViewById(R.id.longitude);

        name.setText("Dimuthu Ranga");
        age.setText("24");
        email.setText("dimuthu@gmail.com");
        address.setText("Godagama");
        contact.setText("0754326854");
        profession.setText("Associate Software Engineer");
        affiliation.setText("IEEE, FOSS Community");
        qualifications.setText("O/L, A/L, Bachelor Degree (Software Engineer)");
        latitude.setText("6.2461254");
        longitude.setText("80.156123");
        nic.setText("9828532641V");

    }
}