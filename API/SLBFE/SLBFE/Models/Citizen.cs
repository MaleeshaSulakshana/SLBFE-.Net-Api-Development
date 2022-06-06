using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Models
{
    public class Citizen
    {
        [Key]
        public int UserId { get; set; }

        public string NationalId { get; set; }

        public string Name { get; set; }

        public int Age { get; set; }

        public string Address { get; set; }

        public string Latitude { get; set; }

        public string Longitude { get; set; }

        public string Profession { get; set; }

        public string Email { get; set; }

        public string Affiliation { get; set; }

        public string Password { get; set; }

        public string Contacts { get; set; }

        public string Qualifications { get; set; }

        public string BirthCetificate { get; set; }

        public string CV { get; set; }

        public string Passport { get; set; }

    }
}
