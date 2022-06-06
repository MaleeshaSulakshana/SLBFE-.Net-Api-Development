using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Models
{
    public class Job
    {

        [Key]
        public int JobId { get; set; }

        public string Title { get; set; }

        public string Company { get; set; }

        public string Location { get; set; }

        public string Description { get; set; }

        public string Responsibilities { get; set; }

        public string Qualifications { get; set; }

        public string Skills { get; set; }

        public DateTime Date { get; set; }


    }
}
