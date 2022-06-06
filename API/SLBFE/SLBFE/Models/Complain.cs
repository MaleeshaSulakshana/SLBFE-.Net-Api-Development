using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Models
{
    public class Complain
    {

        [Key]
        public int ComplainId { get; set; }

        public string CitizenNid { get; set; }

        public string Message { get; set; }

        public string Date { get; set; }

        public string Reply { get; set; }

    }
}
