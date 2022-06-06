using Microsoft.EntityFrameworkCore;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Contexts
{
    public class ModelsDbContext : DbContext
    {

        public ModelsDbContext(DbContextOptions options) : base(options)
        { 
        
        }

        public DbSet<Citizen> Citizen { get; set; }

        /*public DbSet<Citizen> CitizenDetail { get; set; }*/

        public DbSet<Officer> Officer { get; set; }

        public DbSet<Company> Company { get; set; }

        public DbSet<Complain> Complain { get; set; }

        public DbSet<Job> Job { get; set; }

    }
}
