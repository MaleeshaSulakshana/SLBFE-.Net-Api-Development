using Microsoft.EntityFrameworkCore;
using SLBFE.Contexts;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public class OfficerRepository : IOfficerRepository
    {

        protected ModelsDbContext _context;

        public OfficerRepository(ModelsDbContext context)
        {
            _context = context;
        }

        public Officer GetOfficer(string id)
        {
            return _context.Officer.AsNoTracking().FirstOrDefault(c => c.NationalId == id);
        }

        public Officer GetOfficerByEmail(string email)
        {
            return _context.Officer.AsNoTracking().FirstOrDefault(c => c.Email == email);
        }

        public IEnumerable<Officer> GetOfficers()
        {
            return _context.Officer.AsNoTracking().ToList();
        }

        public void AddOfficer(Officer officer)
        {
            _context.Officer.Add(officer);
            _context.SaveChanges();
        }

        public void DeleteOfficer(Officer officer)
        {
            _context.Remove(officer);
            _context.SaveChanges();
        }

        public void UpdateOfficer(Officer officer)
        {
            _context.Entry(officer).State = EntityState.Modified;
            _context.SaveChanges();
        }

    }
}
