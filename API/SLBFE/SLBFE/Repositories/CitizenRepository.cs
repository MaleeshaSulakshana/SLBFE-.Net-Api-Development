using Microsoft.EntityFrameworkCore;
using SLBFE.Contexts;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public class CitizenRepository : ICitizenRepository
    {

        protected ModelsDbContext _context;

        public CitizenRepository(ModelsDbContext context)
        {
            _context = context;
        }

        public Citizen GetCitizen(string nid)
        {
            return _context.Citizen.AsNoTracking().FirstOrDefault(c => c.NationalId == nid);
        }

        public IEnumerable<Citizen> GetCitizens()
        {
            return _context.Citizen.AsNoTracking().ToList();
        }

        public IEnumerable<Citizen> GetCitizensByQualifications(string qualifications)
        {
            return _context.Citizen.Where(c => c.Qualifications.ToLower().Contains(qualifications.ToLower())).ToList();
        }

        public void AddCitizen(Citizen citizen)
        {
            _context.Citizen.Add(citizen);
            _context.SaveChanges();
        }

        public void DeleteCitizen(Citizen citizen)
        {
            _context.Remove(citizen);
            _context.SaveChanges();
        }

        public void UpdateCitizen(Citizen citizen)
        {
            _context.Entry(citizen).State = EntityState.Modified;
            _context.SaveChanges();
        }
    }
}
