using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Models
{
    public class Officer
    {

        [Key]
        public int OfficerId { get; set; }

        public string NationalId { get; set; }

        public string Name { get; set; }

        public string Position { get; set; }

        public string Email { get; set; }

        public string Password { get; set; }

        public string Contacts { get; set; }

    }
}
